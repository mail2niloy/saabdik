import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { HttpHeaders  } from '@angular/common/http';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

/*
  Generated class for the RemoteDataProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class RemoteDataProvider {
 
  url : any;
  dateTime : any;
  constructor(public http: HttpClient) {
    console.log('Hello RemoteDataProvider Provider');
      
  }


  listPosts(type:any, per_page:any, page:any):Observable<any>
  {
    
    this.dateTime = new Date();
    if(type=='popular')
    {
      this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[tag]=popular&date='+this.dateTime+'&_embed';
    }
    else if(type=='bises-sonkhya')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[cat]=29&date='+this.dateTime+'&_embed';
    }
    else if(type=='puja-sonkhya')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[tag]=puja-2019&date='+this.dateTime+'&_embed';
    }
    else if(type=='news')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[cat]=65&date='+this.dateTime+'&_embed';
    }
    else if(type=='announcement')
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[cat]=66&date='+this.dateTime+'&_embed';
    } 
    else
    {
    	this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[tag]=V2&date='+this.dateTime+'&_embed';
    } 
    console.log(this.url);
    
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listCategoryPosts(cat_id:any, per_page:any, page:any)
  {
  	this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
  	console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listSearchPosts(searchText:any, per_page:any, page:any)
  {
    this.url = 'https://saabdik.com/wp-json/wp/v2/posts?search='+searchText+'&page='+page+'&per_page='+per_page+'&date='+this.dateTime+'&_embed';
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listUsers(type:any, per_page:any, page:any)
  {
    console.log(type);
    if(type=='author')
    {
      this.url = 'https://saabdik.com/wp-json/wp/v2/users?page='+page+'&per_page='+per_page+'&role=author&date='+this.dateTime;
    }
    else
    {
       this.url = 'https://saabdik.com/wp-json/wp/v2/posts?page='+page+'&date='+this.dateTime+'&per_page='+per_page;
    }
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

}
