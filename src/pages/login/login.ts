import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { AuthenticationService } from '../../services/authentication.service';
import { BasicService } from '../../services/basic.service';
import { Validators, FormBuilder, FormGroup, FormControl } from '@angular/forms';
import { GooglePlus } from '@ionic-native/google-plus';
import { HomePage } from '../home/home';
/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  isUserLoggedIn = false;
  userRegistration = false;
  userInfo : any;
  register_form : any;
  res: any;
  data : any;
  loading:any;

  constructor(public navCtrl: NavController, 
    public navParams: NavParams,
    public formBuilder: FormBuilder,
    private loadingController: LoadingController, 
    public authenticationService: AuthenticationService,
    public basicService: BasicService,
    private gp: GooglePlus) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
    this.authenticationService.getUser().then(res => {
      this.isUserLoggedIn = true;
      this.userInfo=res;
      console.log("user found");},
      err=>{
        console.log("user not found");
        this.isUserLoggedIn = false;
        //this.logout();
      });
     this.register_form = this.formBuilder.group({
      username: new FormControl('', Validators.required),
      password: new FormControl('', Validators.required),
      displayName: new FormControl('', Validators.required),
      email: new FormControl('', Validators.required),
    });
  }

  loginWithGP(){
    console.log("LoginGP called");
    
    this.gp.login({}).then(res=>{
      console.log('user connected via google');
    	console.log(res);
	    this.userInfo=res;
      this.presentLoadingDefault();
      this.authenticationService.findUser(this.userInfo.email).subscribe(res=>{
                                  this.data = res;
                                  console.log(this.data);
                                  if (this.data.length > 0) {
                                    console.log('user is registered');
                                    this.authenticationService.setUser({
                                     displayname: this.userInfo.displayName,
                                     email: this.userInfo.email,
                                     imageUrl: this.userInfo.imageUrl
                                   });
                                    this.isUserLoggedIn=true;
                                    this.userRegistration = false;
                                  }
                                  else
                                  {
                                     console.log('user is not registered'+this.userInfo.email);
                                     this.logout();
                                     this.userRegistration = true;
                                  }
                                  this.loading.dismiss();
                                  /*this.authenticationService.setUser({
                                     displayname: this.userInfo.displayName,
                                     email: this.userInfo.email,
                                     imageUrl: this.userInfo.imageUrl
                                   });*/
                                   this.navCtrl.setRoot(HomePage);

                                });
      

      
	    
    }).catch( err => {
    	console.log('Error in google plus login');
    	alert("There is an error " + JSON.stringify(err));
    	console.log(err)});
   }

   createAccount(values){
    let username = 'email2niloysarkar@gmail.com'; // this should be an administrator Username
    let password = 'Niloy@123'; // this should be an administrator Password
    //only authenticated administrators can create users
    this.presentLoadingDefault();
    this.authenticationService.doLogin(username, password)
      .subscribe(
      res => {
        this.res = res;
        console.log('Admin Authentication result');
        console.log(res);
        let user_data = {
          username: values.username,
          name: values.displayName,
          email: values.email,
          password: values.password
        };
        this.authenticationService.doRegister(user_data, this.res.token)
        .subscribe(
          result => {
            this.loading.dismiss();
            console.log('User Registration result');
            this.loginWithGP();
            this.userRegistration = false;
            console.log(result);
          },
          error => {
            this.loading.dismiss();
            console.log('User Registration error');
            console.log(error);
          }
        );
      },
      err => {
        this.loading.dismiss();
        console.log('Admin Authentication error');
        console.log(err);
      }
    );
  }



   logout(){
      console.log('Logout called');
      this.authenticationService.logOut();
      this.isUserLoggedIn=false;
	    this.gp.logout().then( ()=>{
      console.log('GP logout successful');
      
	    });
    }

    presentLoadingDefault() {
     this.loading = this.loadingController.create({
      content: 'অপেক্ষা করুন....'
    });

    this.loading.present();
    
  }



}
