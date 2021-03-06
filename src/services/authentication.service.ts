import { Injectable } from '@angular/core';
import { Storage } from '@ionic/storage';
import { HttpClient , HttpHeaders }  from '@angular/common/http';
import * as Config from '../config';

@Injectable()
export class AuthenticationService {

  dateTime: any;

  constructor(
    private storage: Storage,
    public http: HttpClient 
  ){}

  getUser(){
    return this.storage.get('User');
  }

  setUser(user){
    return this.storage.set('User', user);
  }

  logOut(){
    return this.storage.remove('User');
  }

  doLogin(username, password){
    console.log(Config.WORDPRESS_URL + 'wp-json/jwt-auth/v1/token');
    console.log(username + '------'+password);
    return this.http.post(Config.WORDPRESS_URL + 'wp-json/jwt-auth/v1/token',{
      username: username,
      password: password
    })
  }

  doRegister(user_data, token){
    console.log(Config.WORDPRESS_REST_API_URL + 'users?token=' + token);
    let header: HttpHeaders;
    header = new HttpHeaders({ "Authorization": "Bearer " + token });
    return this.http.post(Config.WORDPRESS_REST_API_URL + 'users', user_data, {headers:header}); 
  }

  findUser(email)
  {
    this.dateTime = new Date();
    console.log(Config.WORDPRESS_REST_API_URL + 'users?search=' + email);
    
    return this.http.get(Config.WORDPRESS_REST_API_URL + 'users?datetime='+this.dateTime+'&search=' + email).map(res => res )
                                  .catch(error => error);
  }

  validateAuthToken(token){
    let header : HttpHeaders = new HttpHeaders();
    header.append('Authorization','Basic ' + token);
    return this.http.post(Config.WORDPRESS_URL + 'wp-json/jwt-auth/v1/token/validate?token=' + token,
      {}, {headers: header})
  }
}
