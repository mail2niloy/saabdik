import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
import { ReadPage } from '../read/read';
/**
 * Generated class for the PostsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-posts',
  templateUrl: 'posts.html',
})
export class PostsPage {
  loading:any;
  category:any;
  posts:any;
  constructor(public navCtrl: NavController, public navParams: NavParams, private loadingController: LoadingController, public RemoteDataProvider: RemoteDataProvider) {
  	this.category = this.navParams.get('category');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad PostsPage');
    this.presentLoadingDefault();
    this.RemoteDataProvider.listCategoryPosts(this.category.id).subscribe(data => {
        this.posts = data;
        this.loading.dismiss();
        console.log(data)  });
  }

  presentLoadingDefault() {
     this.loading = this.loadingController.create({
      content: 'Please wait...'
    });

    this.loading.present();
    
  }
  openReadPage(post:any[]){
    this.navCtrl.push(ReadPage, {post:post})
  }

}
