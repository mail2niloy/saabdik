import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
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
  constructor(public navCtrl: NavController, 
    public navParams: NavParams, public httpClient: HttpClient, 
    private loadingController: LoadingController, 
    public RemoteDataProvider: RemoteDataProvider) {
  	
    

  }

  ionViewDidLoad() {
  	this.presentLoadingDefault();
  	this.RemoteDataProvider.listCategories(50,1).subscribe(data => {
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
      content: 'অপেক্ষা করুন....'
    });

    this.loading.present();
    
  }

}
