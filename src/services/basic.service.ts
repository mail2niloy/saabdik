import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { AuthenticationService } from '../services/authentication.service';
import { GooglePlus } from '@ionic-native/google-plus/ngx';

/*
  Generated class for the BasicProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class BasicService {

  constructor(public http: HttpClient, 
    public authenticationService: AuthenticationService,
    public gp: GooglePlus) {
    console.log('Hello BasicService Provider');
  }

  logout(){
      console.log('Logout called');
      this.authenticationService.logOut();
      this.gp.logout().then( ()=>{
      console.log('GP logout successful');
      
      });
	    
    }
  isUserLoggedin()
  {
    this.authenticationService.getUser().then(res => {
      console.log("user found");
      return true;
    },
    err=>{
      console.log("user not found");
      return false;
      //this.logout();
    });
  }

}
