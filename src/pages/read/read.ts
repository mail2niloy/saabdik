import { Component } from '@angular/core';
import { SocialSharing } from '@ionic-native/social-sharing';
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
  user: string;
  data: any = [];
  comments: any = [];
  categories : any = [];
  morePagesAvailable: boolean = true;

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
      this.getComments())
      .subscribe(data => {
        this.data = data;
        this.user = this.data[0].name;
        this.categories = this.data[1];
        this.comments = this.data[2];
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
    let user: any;

    this.authenticationService.getUser()
    .then(res => {
      console.log('Return from authentication with sucess');
      user = res;

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
            this.wordpressService.createComment(this.post.id, user, data.comment)
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
    },
    err => {
      console.log('Return from authentication with error');
      let alert = this.alertCtrl.create({
        title: 'Please login',
        message: 'You need to login in order to comment',
        buttons: [
          {
            text: 'Cancel',
            role: 'cancel',
            handler: () => {
              console.log('Cancel clicked');
            }
          },
          {
            text: 'Login',
            handler: () => {
              this.navCtrl.push(LoginPage);
            }
          }
        ]
      });
    alert.present();
    });
  }

}
