import { Component } from '@angular/core';
import { SocialSharing } from '@ionic-native/social-sharing';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the ReadPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-read',
  templateUrl: 'read.html',
})
export class ReadPage {

  post : any[];
  author : any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public SocialSharing:SocialSharing) {
  	this.post = this.navParams.get('post');
  	console.log(this.post);
  	//this.author =  "";
  	//this.author = this.post._embedded.author[0].name;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ReadPage');
  }

  sharePost(post : any ){
  	this.SocialSharing.share(post.title.rendered+" "+post.link, post.title.rendered, null, null)
  }

}
