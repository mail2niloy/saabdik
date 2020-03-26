import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { PostsPage } from '../posts/posts';

@Component({
  selector: 'page-category',
  templateUrl: 'category.html',
})
export class CategoryPage {

  categories: any = [];
  loading:any;
  constructor(public navCtrl: NavController, public navParams: NavParams, public httpClient: HttpClient, private loadingController: LoadingController) {
  	
    

  }

  ionViewDidLoad() {
  	this.presentLoadingDefault();
  	this.httpClient.get('https://saabdik.com/wp-json/wp/v2/categories?per_page=50').map(res => res ).subscribe(data => {
  			this.categories = data;
  			this.loading.dismiss();
            console.log(data)  });
    console.log('ionViewDidLoad CategoryPage');
  }
  getCategoryPosts(category: any){
  	this.navCtrl.push(PostsPage, {category:category})
  }
  presentLoadingDefault() {
     this.loading = this.loadingController.create({
      content: 'Please wait...'
    });

    this.loading.present();
    
  }

}
