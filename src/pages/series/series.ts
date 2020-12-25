import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController } from 'ionic-angular';
import { RemoteDataProvider } from '../../providers/remote-data/remote-data';
import { ReadPage } from '../read/read';

/**
 * Generated class for the SeriesPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: 'page-series',
  templateUrl: 'series.html',
})
export class SeriesPage {
  series: any = []; 
  posts:any = [];  
  data: any = [];
  page = 1;
  per_page = 7;  
  loading:any;
  errorMessage:any;
  public pagingEnabled: boolean = true;
  constructor(public navCtrl: NavController, 
  	public navParams: NavParams, 
  	private loadingController: LoadingController, 
  	public RemoteDataProvider: RemoteDataProvider){
  	this.series = this.navParams.get('series');
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SeriesPage');
    this.presentLoadingDefault();
	this.RemoteDataProvider.listSeriesPosts(this.series.slug, this.per_page, this.page).subscribe(data => {
	this.posts = data;
	this.loading.dismiss();
	console.log(data)  });
    
  }

  doInfinite(infiniteScroll) {
    this.page = this.page+1;
    setTimeout(() => {
      this.RemoteDataProvider.listSeriesPosts(this.series.slug, this.per_page, this.page)
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

}
