import { Component } from '@angular/core';
import { IonicPage} from 'ionic-angular';
import { NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
import { WordpressService } from '../../services/wordpress.service';
import { AuthenticationService } from '../../services/authentication.service';
import { Observable } from "rxjs/Observable";
import { ReadPage } from '../read/read';
import { PostsPage } from '../posts/posts';
/**
 * Generated class for the AuthorPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-author',
  templateUrl: 'author.html',
})
export class AuthorPage {
  author: any = [];
  posts: any = [];
  loading: any;
  data: any = [];
  page = 1;
  per_page = 7;
  errorMessage:any;
  public pagingEnabled: boolean = true;
  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public loadingController: LoadingController,
    public alertCtrl: AlertController,
    public wordpressService: WordpressService,
    public authenticationService: AuthenticationService, 
    public RemoteDataProvider: RemoteDataProvider) 
  	{
	    //this.morePagesAvailable = true;
	    this.presentLoadingDefault();
	    //loading.present(); 
	    this.author = this.navParams.get('author'); 
	    console.log(this.author);
      this.RemoteDataProvider.listAuthorPosts(this.author.id, this.per_page, this.page).subscribe(data => {
        this.posts = data;
        this.loading.dismiss();
        console.log(data)  });
	}
   doInfinite(infiniteScroll) {
    this.page = this.page+1;
    setTimeout(() => {
      this.RemoteDataProvider.listAuthorPosts(this.author.id, this.per_page, this.page)
         .subscribe(
           res => {
            //this.latest_posts = res;

             this.data = res;
             /*this.perPage = this.data.per_page;
             this.totalData = this.data.total;
             this.totalPage = this.data.total_pages;
             */
             if(this.data)
             {
              for(let i=0; i<this.data.length; i++) {
                  
                  this.posts.push(this.data[i]);
                  
                 
               }
             }
               
             console.log('Async operation has ended');
             infiniteScroll.complete();
           },
           error =>  {
                    this.pagingEnabled = false;
                    infiniteScroll.complete();
                    console.log("No more data");
                    
                });

      
    });
  }

  presentLoadingDefault() {
     this.loading = this.loadingController.create({
      content: 'অপেক্ষা করুন....'
    });

    this.loading.present();
    
  }
  openReadPage(post:any[]){
    this.navCtrl.push(ReadPage, {post:post})
  }
  getCategoryPosts(category: any){
    this.navCtrl.push(PostsPage, {category:category})
  }
  ionViewDidLoad() {
    console.log('ionViewDidLoad AuthorPage');
  }

}
