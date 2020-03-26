import { Component } from '@angular/core';
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
  constructor(public navCtrl: NavController, public navParams: NavParams) {
  	this.post = this.navParams.get('post');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ReadPage');
  }

}
