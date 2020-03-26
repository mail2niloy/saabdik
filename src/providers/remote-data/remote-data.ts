import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

/*
  Generated class for the RemoteDataProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class RemoteDataProvider {

  url : any;
  constructor(public http: HttpClient) {
    console.log('Hello RemoteDataProvider Provider');
  }


  listPosts(type:any)
  {
    
    
    if(type=='popular')
    {
      this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[tag]=popular&_embed';
    }
    else if(type=='bises-sonkhya')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[cat]=29&_embed';
    }
    else if(type=='puja-sonkhya')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[tag]=puja-2019&_embed';
    }
    else if(type=='news')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[cat]=65&_embed';
    }
    else if(type=='announcement')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[cat]=66&_embed';
    } 
    else
    {
    	this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[tag]=V2&_embed';
    } 
    console.log(this.url);
    return this.http.get(this.url).map(res => res );
  }
  listCategoryPosts(cat_id:any)
  {
  	this.url = 'https://saabdik.com/wp-json/wp/v2/posts?per_page=10&filter[cat]='+cat_id;
  	console.log(this.url);
    return this.http.get(this.url).map(res => res );
  }

}
