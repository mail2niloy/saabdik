import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AuthenticationService } from '../../services/authentication.service';
import { BasicService } from '../../services/basic.service';
import { HomePage } from '../home/home';
import { MembershipPage } from '../membership/membership';
/**
 * Generated class for the ProfilePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-profile',
  templateUrl: 'profile.html',
})
export class ProfilePage {
  isUserLoggedIn = false;
  userInfo : any;
  res: any;
  data : any;
  loading:any;

  constructor(public navCtrl: NavController, 
  	public navParams: NavParams, 
    public authenticationService: AuthenticationService,
    public basicService: BasicService) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ProfilePage');
    this.authenticationService.getUser().then(res => {
      this.isUserLoggedIn = true;
      this.userInfo=res;
      console.log("user found");},
      err=>{
        console.log("user not found");
        this.isUserLoggedIn = false;
        //this.logout();
      });
  }
  openMembeshipPage()
  {
  	this.navCtrl.push(MembershipPage);
  }
  logout()
  {
  	this.basicService.logout();
  	this.navCtrl.setRoot(HomePage);
  }

}
