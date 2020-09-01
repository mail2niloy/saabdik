import { Component } from '@angular/core';
import { SocialSharing } from '@ionic-native/social-sharing/ngx';
import { DomSanitizer } from '@angular/platform-browser';
import { NavController, NavParams, LoadingController, AlertController } from 'ionic-angular';
import { WordpressService } from '../../services/wordpress.service';
import { AuthenticationService } from '../../services/authentication.service';
import { Observable } from "rxjs/Observable";
import { LoginPage } from '../login/login';
import { HomePage } from '../home/home';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/forkJoin';
import { AudioProvider } from 'ionic-audio3';
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

  post : any={};
  post_data: any = [];
  author : any = [];
  user: any = [];
  likes: any = [];
  data: any = [];
  comments: any = [];
  categories : any = [];
  morePagesAvailable: boolean = true;
  audioEnabled = false;
  videoEnabled = false;
  isLiked = false;
  isInLibrary = false;
  noOfLikes = 0;
  myTracks:any;
  selectedTrack:any;
  library_info:any;
  videoURL : any;
  audioURL : any;

  constructor(public navCtrl: NavController, 
    public navParams: NavParams, 
    public SocialSharing:SocialSharing,
    public loadingCtrl: LoadingController,
    public alertCtrl: AlertController,
    public wordpressService: WordpressService,
    public authenticationService: AuthenticationService,    
    private _audioProvider: AudioProvider,
    public sanitizer: DomSanitizer
    ) {
    this.morePagesAvailable = true;
    let loading = this.loadingCtrl.create();
    loading.present(); 
    this.post_data = this.navParams.get('post'); 
    console.log(this.post_data);
    // plugin won't preload data by default, unless preload property is defined within json object - defaults to 'none'
    this.myTracks = [{
      src: this.post_data.audio_playlist,
      artist: 'John Mayer',
      title: 'Why Georgia',
      art: 'assets/background.jpg',
      preload: 'metadata' // tell the plugin to preload metadata such as duration for this track, set to 'none' to turn off
    }/*,
    {
      src: 'https://archive.org/download/JM2013-10-05.flac16/V0/jm2013-10-05-t30-MP3-V0.mp3',
      artist: 'John Mayer',
      title: 'Who Says',
      art: 'assets/background.jpg',
      preload: 'metadata' // tell the plugin to preload metadata such as duration for this track,  set to 'none' to turn off
    }*/];

    this.selectedTrack = this.myTracks[0];
    
    for(var i in this.post_data.tags){
      if(this.post_data.tags[i].slug=='audio')
      {
        this.audioEnabled = true;
      }
      if(this.post_data.tags[i].slug=='video')
      {
        this.videoEnabled = true;
      }
    this.videoURL = this.sanitizer.bypassSecurityTrustResourceUrl(this.post_data.video_playlist);
    this.audioURL = this.sanitizer.bypassSecurityTrustResourceUrl(this.post_data.audio_playlist);
    console.log(this.post_data.tags[i].name);//This will print the objects
    console.log('index '+i);//This will print the index of the objects
    }

    //console.log(JSON.stringify(this.post_data));

    this.getLoggedinUserData().then(data => {
      this.user = data;
      console.log("data "+JSON.stringify(data));},
    error => console.error(error));

    Observable.forkJoin(
      this.getAuthorData(),
      this.getCategories(),
      this.getComments(),
      this.getLikes(),
      this.getPostDetails(),
      this.getLibraryInfo())
      .subscribe(data => {
        
        this.data = data;
        this.author = this.data[0];
        this.categories = this.data[1];
        this.comments = this.data[2];
        //this.user = this.data[3];
        this.likes = this.data[3];
        this.post = this.data[4];
        this.library_info = this.data[5];
        this.post.title_rendered =this.post.title.rendered;
        this.post.content_rendered = this.post.content.rendered;
        this.author['author_thumbnail'] = this.author['basic_user_avatar'][96];
        console.log("library - "+JSON.stringify(this.library_info));
        console.log(this.post);
        

        //console.log("Like "+this.likes[0].is_liked);
        for(let like of this.likes)
        {
          console.log("value ->",like.user_email);
          if(like.is_liked=='1' && like.user_email==this.user.email)
          {
            this.isLiked = true;
            console.log("Like 1");
          }
          if(like.is_liked=='1')
          {
            this.noOfLikes = this.noOfLikes + 1;
            console.log("No of Likes"+this.noOfLikes);
          }
        }
        for(let post_library of this.library_info)
        {
          console.log("value ->",post_library.user_email);
          if(post_library.is_in_library=='1' && post_library.user_email==this.user.email)
          {
            this.isInLibrary = true;
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

  /*playStreamAudio(){
    let options: StreamingAudioOptions = {
      successCallback: () => { console.log('Audio played') },
      errorCallback: (e) => { console.log('Error streaming') }
    };

    console.log(this.post_data.audio_playlist);
    this.streamingMedia.playAudio(this.post_data.audio_playlist, options);
  }
  playStreamVideo(){
    let options: StreamingVideoOptions = {
      successCallback: () => { console.log('Audio played') },
      errorCallback: (e) => { console.log('Error streaming') }
    };

    this.streamingMedia.playVideo('https://saabdik.com/wp-content/uploads/2020/05/Sleep-Away.mp3', options);
  }*/

  ngAfterContentInit() {
    // get all tracks managed by AudioProvider so we can control playback via the API
    //this.allTracks = this._audioProvider.tracks;
  }

  playSelectedTrack() {
    // use AudioProvider to control selected track
    this._audioProvider.play(this.selectedTrack);
  }

  pauseSelectedTrack() {
     // use AudioProvider to control selected track
     this._audioProvider.pause(this.selectedTrack);
  }

  onTrackFinished(track: any) {
    console.log('Track finished', track)
  }

  sharePost(post : any ){
  	this.SocialSharing.share(post.title.rendered+" "+post.link, post.title.rendered, null, null)
  }

  getPostDetails(){
    return this.wordpressService.getPostDetails(this.post_data.ID);
  }

  getAuthorData(){
    return this.wordpressService.getAuthor(this.post_data.post_author);
  }

  getCategories(){
    return this.wordpressService.getPostCategories(this.post_data.post_categories);
  }

  getComments(){
    return this.wordpressService.getComments(this.post_data.ID);
  }
  getLoggedinUserData(){
    return this.authenticationService.getUser();
  }
  getLikes(){
    return this.wordpressService.getLikes(this.post_data.ID);
  }
  getLibraryInfo(){
    return this.wordpressService.getLibraryInfo(this.post_data.ID);
  }
  

  likePost(){
    if(this.isLiked)
    {
      this.isLiked=false;
      this.noOfLikes=this.noOfLikes-1;
    }
    else
    {
      this.isLiked=true;
      this.noOfLikes=this.noOfLikes+1;
    }
    console.log(this.user.email);
    this.wordpressService.likePost(this.post.id, this.user.email).subscribe(data => {
        console.log(JSON.stringify(data));        
      });
  }

  addToLibrary(){
    if(this.isInLibrary)
    {
      this.isInLibrary=false;
    }
    else
    {
      this.isInLibrary=true;
    }
    this.wordpressService.addToLibrary(this.user.email, this.post_data.ID).subscribe(data => {
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
