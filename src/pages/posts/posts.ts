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
  posts:any = [];  
  data: any = [];
  page = 1;
  per_page = 7;
  errorMessage:any;
  constructor(public navCtrl: NavController, public navParams: NavParams, private loadingController: LoadingController, public RemoteDataProvider: RemoteDataProvider) {
  	this.category = this.navParams.get('category');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad PostsPage');
    this.presentLoadingDefault();
    this.RemoteDataProvider.listCategoryPosts(this.category.id, this.per_page, this.page).subscribe(data => {
        this.posts = data;
        this.loading.dismiss();
        console.log(data)  });
  }

  doInfinite(infiniteScroll) {
    this.page = this.page+1;
    setTimeout(() => {
      this.RemoteDataProvider.listCategoryPosts(this.category.id, this.per_page, this.page)
         .subscribe(
           res => {
            //this.latest_posts = res;

             this.data = res;
             /*this.perPage = this.data.per_page;
             this.totalData = this.data.total;
             this.totalPage = this.data.total_pages;
             */
             for(let i=0; i<this.data.length; i++) {
                
                this.posts.push(this.data[i]);
                
               
             }
           },
           error =>  this.errorMessage = <any>error);

      console.log('Async operation has ended');
      infiniteScroll.complete();
    }, 4000);
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
