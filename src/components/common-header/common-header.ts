import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { SearchPage } from '../../pages/search/search';
/**
 * Generated class for the CommonHeaderComponent component.
 *
 * See https://angular.io/api/core/Component for more info on Angular
 * Components.
 */
@Component({
  selector: 'common-header',
  templateUrl: 'common-header.html'
})
export class CommonHeaderComponent {

  text: string;

  toggled:any;



  constructor(public navCtrl: NavController) {
    console.log('Hello CommonHeaderComponent Component');
    this.text = 'Hello World';

      this.toggled = false;
  }
  toggleSearch() {
        this.toggled = this.toggled ? false : true;
  }
  searchPosts( ev: any ) {
      // Reset items back to all of the items
      //this.initializeItems();
      // set val to the value of the searchbar
      let val = ev.target.value;
      console.log(val)
      // if the value is an empty string don't filter the items
      if (val && val.trim() != '') {
        console.log("Push to search page");
        this.navCtrl.push(SearchPage, {searchText:val.trim()});
        
      }  
  }
  

}
