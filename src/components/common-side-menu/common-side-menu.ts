import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { LoginPage } from '../../pages/login/login';
import { ProfilePage } from '../../pages/profile/profile';
import { AboutPage } from '../../pages/about/about';
import { AuthenticationService } from '../../services/authentication.service';
import { BasicService } from '../../services/basic.service';


/**
 * Generated class for the CommonSideMenuComponent component.
 *
 * See https://angular.io/api/core/Component for more info on Angular
 * Components.
 */
@Component({
  selector: 'common-side-menu',
  templateUrl: 'common-side-menu.html'
})
export class CommonSideMenuComponent {

  text: string;
  isUserLoggedIn: any;
  userInfo:any;

  constructor(public navCtrl: NavController,
    public authenticationService: AuthenticationService,
    public basicService: BasicService) {
    console.log('Hello CommonSideMenuComponent Component');
    this.text = 'Hello World';
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
  ionViewWillEnter() {
    console.log('ionViewWillEnter Side Menu');
    
  }
  
  openLoginPage(){
    this.navCtrl.push(LoginPage);
  }
  openProfilePage(){
    this.navCtrl.push(ProfilePage);
  }
  openAboutPage(){
    this.navCtrl.push(AboutPage);
  }
  logout()
  {
    this.basicService.logout();
  }

}
