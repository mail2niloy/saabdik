import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController  } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { ReadPage } from '../read/read';
import { SearchPage } from '../search/search';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
import { AuthenticationService } from '../../services/authentication.service';
import { BasicService } from '../../services/basic.service';
import { ViewChild } from '@angular/core';
import { Slides } from 'ionic-angular';
//import { CommonHeaderComponent } from '../../compon/common-header/common-header';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  remoteData: Observable<any>;
	posts: any = [];
  authors: any = []; 
  data: any = [];
  latest_posts: any = [];
  popular_posts: any = [];
  bises_sonkhya_posts: any = [];
  puja_sonkhya_posts: any = [];
  url:any;
  loading:any;
  page=1;
  per_page=7;
  errorMessage:any;
  type:any;
  topTab:any;
  items: any = [];
  public pagingEnabled: boolean = true;
  public homeEnabled: boolean;
  isUserLoggedIn : any;
  userInfo: any;

  sliderConfig = {
    spaceBetween : 10,
    centeredSlides: true,
    slidesPerView: 1.6
  }
  @ViewChild(Slides) slides: Slides;


  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public httpClient: HttpClient, 
    private loadingController: LoadingController,
    public authenticationService: AuthenticationService,
    public basicService: BasicService, 
    public RemoteDataProvider: RemoteDataProvider) {
  	
      this.topTab = "home";
      this.homeEnabled = true;
      this.latest_posts = null;
      
      
      

  }

  ionViewDidEnter(){
    console.log("You are in Home");
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
  

   initializeItems() {
        this.items = ['Amsterdam','Bogota','Mumbai','San José','Salvador']; 
  }
    

  

  listPosts(type : any)
  {
    //this.presentLoadingDefault();
    
    this.pagingEnabled = true;
    this.type = type;
    if(type=='home')
    {
      this.homeEnabled = true;
      this.posts = this.latest_posts;
    }
    else if(type=='popular')
    {
      this.homeEnabled = false;
      this.posts = this.popular_posts;
    }
    else if(type=='bises-sonkhya')
    {
       this.homeEnabled = false;
       this.posts = this.bises_sonkhya_posts;
    }
    else if(type=='puja-sonkhya')
    {
       this.homeEnabled = false;
       this.posts = this.puja_sonkhya_posts;
    } 
    else
    {
      this.homeEnabled = false;
      this.posts = this.latest_posts;
    }

    //this.loading.dismiss();
    
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

  ionViewDidLoad() {
    this.presentLoadingDefault();
    this.remoteData = this.RemoteDataProvider.listPosts(this.type, this.per_page, this.page);
    this.remoteData.subscribe(
          data => {
        this.latest_posts = data;
        this.listPosts('home');
        this.loading.dismiss();
        console.log(data)  });
    this.RemoteDataProvider.listPosts('popular', this.per_page, this.page).subscribe(data => {
        this.popular_posts = data;
        console.log(data)  });
    this.RemoteDataProvider.listPosts('bises-sonkhya', this.per_page, this.page).subscribe(data => {
        this.bises_sonkhya_posts = data;
        console.log(data)  });
    this.RemoteDataProvider.listPosts('puja-sonkhya', this.per_page, this.page).subscribe(data => {
        this.puja_sonkhya_posts = data;
        console.log(data)  });  

    this.RemoteDataProvider.listUsers('author', 10, 1).subscribe(data => {
        this.authors = data;
        console.log(data);  
      });  
    
    console.log('ionViewDidLoad AboutPage');
  }


  doInfinite(infiniteScroll) {
    this.page = this.page+1;
    setTimeout(() => {
      this.remoteData = this.RemoteDataProvider.listPosts(this.type, this.per_page, this.page);
         this.remoteData.subscribe(
           res => {
            //this.latest_posts = res;

             this.data = res;
             /*this.perPage = this.data.per_page;
             this.totalData = this.data.total;
             this.totalPage = this.data.total_pages;
             */
              //console.log(this.data[0].id);
               for(let i=0; i<this.data.length; i++) {
                  if(this.type=='popular')
                  {
                    this.popular_posts.push(this.data[i]);
                  }
                  else if(this.type=='bises-sonkhya')
                  {
                     this.bises_sonkhya_posts.push(this.data[i]);
                  }
                  else if(this.type=='puja-sonkhya')
                  {
                     this.puja_sonkhya_posts.push(this.data[i]);
                  } 
                  else
                  {
                    this.latest_posts.push(this.data[i]);
                  }
                 
               }
              
             infiniteScroll.complete();
             console.log('Async operation has ended');
           },
           error =>  {
                    this.pagingEnabled = false;
                    infiniteScroll.complete();
                    console.log("No more data");
                    
                });

          
          
    });
  }

  //Move to Next slide
  slideNext(object, slideView) {
    slideView.slideNext(500).then(() => {
      this.checkIfNavDisabled(object, slideView);
    });
  }
 
  //Move to previous slide
  slidePrev(object, slideView) {
    slideView.slidePrev(500).then(() => {
      this.checkIfNavDisabled(object, slideView);
    });;
  }
 
  //Method called when slide is changed by drag or navigation
  SlideDidChange(object, slideView) {
    this.checkIfNavDisabled(object, slideView);
  }
 
  //Call methods to check if slide is first or last to enable disbale navigation  
  checkIfNavDisabled(object, slideView) {
    this.checkisBeginning(object, slideView);
    this.checkisEnd(object, slideView);
  }
 
  checkisBeginning(object, slideView) {
    slideView.isBeginning().then((istrue) => {
      object.isBeginningSlide = istrue;
    });
  }
  checkisEnd(object, slideView) {
    slideView.isEnd().then((istrue) => {
      object.isEndSlide = istrue;
    });
  }

}
