import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, Platform  } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { ReadPage } from '../read/read';
import { AuthorPage } from '../author/author';
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
  khalar_dunia_posts: any = [];
  anno_rokom_review_posts: any = [];
  life_style_posts: any = [];
  fitness_posts: any = [];
  bhraman_posts: any = [];
  puran_katha_posts: any = [];
  jibon_kahini_posts: any = [];
  desh_bidesh_posts: any = [];
  book_review_posts: any = [];
  beginners_guide_posts: any = [];
  inspiration_posts: any = [];
  moner_katha_posts: any = [];
  aalap_posts: any = [];
  fashion_posts: any = [];
  photography_posts: any = [];
  heseler_katha_posts: any = [];
  url:any;
  loading:any;
  page=1;
  per_page=10;
  errorMessage:any;
  type:any;
  topTab:any;
  items: any = [];
  public pagingEnabled: boolean = true;
  public homeEnabled: boolean;
  public part2: boolean = false;
  isUserLoggedIn : any;
  userInfo: Observable<any>;
  dataLoaded : boolean = false;

  sliderConfig = {
    spaceBetween : 10,
    centeredSlides: true,
    slidesPerView: 1.6
  }
  @ViewChild(Slides) slides: Slides;


  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public plt: Platform,
    public httpClient: HttpClient, 
    private loadingController: LoadingController,
    public authenticationService: AuthenticationService,
    public basicService: BasicService, 
    public RemoteDataProvider: RemoteDataProvider) {
  	
      this.topTab = "home";
      this.homeEnabled = true;
      this.latest_posts = null;
      this.getUseSavedData();
      this.showHome();
     /* this.plt.ready().then((readySource) => {
      console.log('Platform ready from', readySource);
      this.getUseSavedData();
      // Platform now ready, execute any required native code
    });*/
      
      
      

  }

  ionViewDidEnter(){
    console.log("You are in Home");
    
  }

  getUseSavedData(){

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

  showHome()
  {
    console.log("Show Home Called");
    this.homeEnabled = true;
    this.topTab = "home";
    this.presentLoadingDefault();
    Observable.forkJoin(
      this.RemoteDataProvider.listUsers('author', 10, 1),
      this.RemoteDataProvider.listFrontPagePosts(),
      )
      .subscribe(data => {
        this.dataLoaded = true;        
        this.data = data;
         this.authors = this.data[0];
        this.latest_posts = this.data[1]['latest'];
        this.popular_posts = this.data[1]['popular'];
        this.khalar_dunia_posts = this.data[1]['khalar-dunia'];
        this.anno_rokom_review_posts = this.data[1]['anno-rokom-review'];
        this.life_style_posts = this.data[1]['life-style'];
        this.fitness_posts = this.data[1]['fitness'];
        this.bhraman_posts = this.data[1]['bhraman'];
        this.puran_katha_posts = this.data[1]['puran-katha'];
        this.jibon_kahini_posts = this.data[1]['jibon-kahini'];
        this.desh_bidesh_posts = this.data[1]['desh-bidesh'];
        this.book_review_posts = this.data[1]['book-review'];
        this.beginners_guide_posts = this.data[1]['beginners-guide'];
        this.inspiration_posts = this.data[1]['inspiration'];
        this.moner_katha_posts = this.data[1]['moner-katha'];
        this.aalap_posts = this.data[1]['aalapi'];
        this.fashion_posts = this.data[1]['fashion'];
        this.photography_posts = this.data[1]['photography'];
        this.heseler_katha_posts = this.data[1]['heseler-katha'];
        //console.log(this.data);
        //console.log(JSON.stringify(this.data));
        this.loading.dismiss();
        
      });

  }
    
  /*showHome1()
  {
    this.homeEnabled = true;
    this.topTab = "home";
    this.presentLoadingDefault();
    Observable.forkJoin(
      this.RemoteDataProvider.listUsers('author', 10, 1),
      this.RemoteDataProvider.listPosts('latest', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('popular', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('khalar-dunia', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('anno-rokom-review', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('life-style', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('fitness', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('bhraman', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('puran-katha', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('jibon-kahini', this.per_page, this.page),
      )
      .subscribe(data => {        
        this.data = data;
         this.authors = this.data[0];
        this.latest_posts = this.data[1];
        this.popular_posts = this.data[2];
        this.khalar_dunia_posts = this.data[3];
        this.anno_rokom_review_posts = this.data[4];
        this.life_style_posts = this.data[5];
        this.fitness_posts = this.data[6];
        this.bhraman_posts = this.data[7];
        this.puran_katha_posts = this.data[8];
        this.jibon_kahini_posts = this.data[9];
        console.log(this.data);
        //console.log(JSON.stringify(this.data));
        this.loading.dismiss();
      });

  }*/

  loadMore(infiniteScroll)
  {    
    
    Observable.forkJoin(
      this.RemoteDataProvider.listPosts('desh-bidesh', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('book-review', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('beginners-guide', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('inspiration', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('moner-katha', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('aalap', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('fashion', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('photography', this.per_page, this.page),
      this.RemoteDataProvider.listPosts('heseler-katha', this.per_page, this.page)
      )
      .subscribe(data => {        
        this.data = data;
        this.desh_bidesh_posts = this.data[0];
        this.book_review_posts = this.data[1];
        this.beginners_guide_posts = this.data[2];
        this.inspiration_posts = this.data[3];
        this.moner_katha_posts = this.data[4];
        this.aalap_posts = this.data[5];
        this.fashion_posts = this.data[6];
        this.photography_posts = this.data[7];
        this.heseler_katha_posts = this.data[8];
       
        //console.log(JSON.stringify(this.data));
        this.pagingEnabled = false;
        infiniteScroll.complete();
        this.part2 = true;
      });

  }

  listPosts(type : any)
  {
    this.pagingEnabled = true;
    this.homeEnabled = false;
    this.presentLoadingDefault();
    this.type = type;
    this.page = 1;
    this.remoteData = this.RemoteDataProvider.listPosts(type, this.per_page, this.page);
    this.remoteData.subscribe(
          data => {
        this.posts = data;
        this.loading.dismiss();
        console.log(data)  });      

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

  openAuthorPage(author:any[]){
    this.navCtrl.push(AuthorPage, {author:author})
  }

  ionViewDidLoad() {
      

    
    
    console.log('ionViewDidLoad AboutPage');
  }


  doInfinite(infiniteScroll) {
    this.page = this.page+1;
    setTimeout(() => {
      this.remoteData = this.RemoteDataProvider.listPosts(this.type, this.per_page, this.page);
         this.remoteData.subscribe(
           res => {
            //this.posts = res;
            this.data = res;

             /*this.perPage = this.data.per_page;
             this.totalData = this.data.total;
             this.totalPage = this.data.total_pages;
             */
              //console.log(this.data[0].id);
               for(let i=0; i<this.data.length; i++) {
                this.posts.push(this.data[i]);                  
                 
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
