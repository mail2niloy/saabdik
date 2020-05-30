import { Component } from '@angular/core';
import { SocialSharing } from '@ionic-native/social-sharing/ngx';
import { NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { WordpressService } from '../../services/wordpress.service';
import { AuthenticationService } from '../../services/authentication.service';
import { Observable } from "rxjs/Observable";
import { LoginPage } from '../login/login';
import { HomePage } from '../home/home';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/forkJoin';
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

  post : any;
  author : any;
  user: any;
  likes: any;
  data: any = [];
  comments: any = [];
  categories : any = [];
  morePagesAvailable: boolean = true;
  isLiked = 0;
  noOfLikes = 0;

  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public SocialSharing:SocialSharing,
    public loadingCtrl: LoadingController,
    public alertCtrl: AlertController,
    public wordpressService: WordpressService,
    public authenticationService: AuthenticationService
    ) {
    this.morePagesAvailable = true;
    let loading = this.loadingCtrl.create();
    loading.present();
  	this.post = this.navParams.get('post');
  	console.log(this.post);


    Observable.forkJoin(
      this.getAuthorData(),
      this.getCategories(),
      this.getComments(),
      this.getLoggedinUserData(),
      this.getLikes())
      .subscribe(data => {
        
        this.data = data;
        this.author = this.data[0];
        this.categories = this.data[1];
        this.comments = this.data[2];
        this.user = this.data[3];
        this.likes = this.data[4];
        console.log(JSON.stringify(this.data));
        //console.log("Like "+this.likes[0].is_liked);
        for(let like of this.likes)
        {
          console.log("value ->",like.user_email);
          if(like.is_liked=='1' && like.user_email==this.user.email)
          {
            this.isLiked = 1;
            console.log("Like 1");
          }
          if(like.is_liked=='1')
          {
            this.noOfLikes = this.noOfLikes + 1;
            console.log("No of Likes"+this.noOfLikes);
          }
        }
        /*foreach(this.likes as like)
        {
          if(like.is_liked=='1' && like.user_email==this.user[0].email)
          {
            this.isLiked = 1;
            console.log("Like 1");
          }
          if(like.is_liked=='1')
          {
            this.noOfLikes = this.noOfLikes + 1;
            console.log("No of Likes"+this.noOfLikes);
          }
        }*/
        
        loading.dismiss();
      });
  	//this.author =  "";
  	//this.author = this.post._embedded.author[0].name;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ReadPage');
  }

  sharePost(post : any ){
  	this.SocialSharing.share(post.title.rendered+" "+post.link, post.title.rendered, null, null)
  }
  getAuthorData(){
    return this.wordpressService.getAuthor(this.post.author);
  }

  getCategories(){
    return this.wordpressService.getPostCategories(this.post);
  }

  getComments(){
    return this.wordpressService.getComments(this.post.id);
  }
  getLoggedinUserData(){
    return this.authenticationService.getUser();
  }
  getLikes(){
    return this.wordpressService.getLikes(this.post.id);
  }

  likePost(){
    if(this.isLiked==1)
    {
      this.isLiked=0;
      this.noOfLikes=this.noOfLikes-1;
    }
    else
    {
      this.isLiked=1;
      this.noOfLikes=this.noOfLikes+1;
    }
    console.log(this.user.email);
    this.wordpressService.likePost(this.post.id, this.user.email).subscribe(data => {
        console.log(JSON.stringify(data));        
      });
  }

  loadMoreComments(infiniteScroll) {
    let page = (this.comments.length/10) + 1;
    this.wordpressService.getComments(this.post.id, page)
    .subscribe(data => {
      this.data = data;
      for(let item of this.data){
        this.comments.push(item);
      }
      infiniteScroll.complete();
    }, err => {
      console.log(err);
      this.morePagesAvailable = false;
    })
  }

  createComment(){

      console.log('Create comment');

      let alert = this.alertCtrl.create({
      title: 'Add a comment',
      inputs: [
        {
          name: 'comment',
          placeholder: 'Comment'
        }
      ],
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          handler: data => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Accept',
          handler: data => {
            let loading = this.loadingCtrl.create();
            loading.present();
            this.wordpressService.createComment(this.post.id, this.user, data.comment)
            .subscribe(
              (data) => {
                console.log("ok", data);
                
                  this.getComments()
                  .subscribe(data => {
                    this.data = data;
                    this.comments = this.data;
                    loading.dismiss();
                  });
                
              },
              (err) => {
                console.log("err", err);
                loading.dismiss();
              }
            );
          }
        }
      ]
    });
    alert.present();    
  }

}
