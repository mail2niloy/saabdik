import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { PostsPage } from '../posts/posts';
import { ReadPage } from '../read/read';
import { LoginPage } from '../login/login';
import { GooglePlus } from '@ionic-native/google-plus/ngx';
import { AuthenticationService } from '../../services/authentication.service';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
import { MembershipPage } from '../membership/membership';
import { FileTransfer } from '@ionic-native/file-transfer/ngx';
import { File } from '@ionic-native/file/ngx';
import { DocumentViewer, DocumentViewerOptions } from '@ionic-native/document-viewer/ngx';
import { Platform } from 'ionic-angular';

/**
 * Generated class for the MenuPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-menu',
  templateUrl: 'menu.html',
})
export class MenuPage {
	news_posts : any;
	announcement_posts: any = [];
  isUserLoggedIn = false;
  userInfo : any;
	url:any;
  loading:any;
  page=1;
	per_page=5;
	errorMessage:any;

  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public httpClient: HttpClient, 
    private loadingController: LoadingController, 
    public RemoteDataProvider: RemoteDataProvider,
    public authenticationService: AuthenticationService,
    private gp: GooglePlus,
    private document: DocumentViewer,
    private file: File,
    private transfer: FileTransfer,
    private platform:Platform

    ) {



  }

  ionViewWillEnter(){
    console.log("You are in Menu");
    this.authenticationService.getUser()
    .then(res => {
      console.log(res);
      this.isUserLoggedIn=true;
      this.userInfo = res;
    },
    err => {
      this.isUserLoggedIn=false;
      console.log("user not loggedin");
      });
  }

  ionViewDidLoad() {
    
  	this.presentLoadingDefault();
    this.RemoteDataProvider.listPosts('news', this.per_page, this.page).subscribe(data => {
        this.news_posts = data;
        this.loading.dismiss();
        console.log(data)  });
    this.RemoteDataProvider.listPosts('announcement', this.per_page, this.page).subscribe(data => {
        this.announcement_posts = data;
        console.log(data)  });
    console.log('ionViewDidLoad CategoryPage');
  }
  openReadPage(post:any[]){
    this.navCtrl.push(ReadPage, {post:post});
  }
  getTagPosts(tag: any, title:any){
    this.navCtrl.push(PostsPage, {type:'tag', title:title, tag:tag});
  }  
  openLoginPage()
  {
    this.navCtrl.push(LoginPage);
  }
  openMembeshipPage()
  {
    this.navCtrl.push(MembershipPage);
  }
  presentLoadingDefault() {
     this.loading = this.loadingController.create({
      content: 'Please wait...'
    });

    this.loading.present();
    
  }

  downloadAndOpenPDF()
  {
    let path = null;
    if(this.platform.is('ios'))
    {
      path=this.file.documentsDirectory
    }
    else
    {
      path=this.file.dataDirectory;
    }

    const transfer = this.transfer.create();
    let url = 'https://saabdik.com/wp-content/uploads/2020/12/rabiobasoriyo16.pdf';
    transfer.download(url, path + 'file.pdf').then((entry) => {
      console.log('download complete: ' + entry.toURL());
      //let url = entry.toURL();
        this.document.viewDocument(entry.toURL(), 'application/pdf',{});
    }, (error) => {
      // handle error
    });
  }

  

}
