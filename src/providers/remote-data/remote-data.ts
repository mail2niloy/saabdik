import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { HttpHeaders  } from '@angular/common/http';
import * as Config from '../../config';
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

  listFrontPagePosts()
  {
    this.dateTime = new Date().getTime();
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'posts'+'/?date='+this.dateTime;
    console.log(this.url);
    
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);

  }

  listPosts(type:any, posts_per_page:any, paged:any):Observable<any>
  {
    
    this.dateTime = new Date().getTime();
    
    if(type=='popular')
    {
      this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&tag=popular&date='+this.dateTime+'&_embed';
    }
    else if(type=='chotogolpo')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=3&date='+this.dateTime+'&_embed';
    }
    else if(type=='onugolpo')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=28&date='+this.dateTime+'&_embed';
    }
    else if(type=='bises-rochona')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=12&date='+this.dateTime+'&_embed';
    }
    else if(type=='kobita')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=6&date='+this.dateTime+'&_embed';
    }
    else if(type=='dharabahik-rachona')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=21&date='+this.dateTime+'&_embed';
    }
    else if(type=='bhraman')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=15&date='+this.dateTime+'&_embed';
    }
    else if(type=='khalar-dunia')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=7&date='+this.dateTime+'&_embed';
    }
    else if(type=='rahoshyo-golpo')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=4&date='+this.dateTime+'&_embed';
    }
    else if(type=='bhuter-golpo')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=44&date='+this.dateTime+'&_embed';
    }
    else if(type=='itihaser-patai')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=8&date='+this.dateTime+'&_embed';
    }
    else if(type=='life-style')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=67&date='+this.dateTime+'&_embed';
    }
    else if(type=='heseler-katha')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=10&date='+this.dateTime+'&_embed';
    }
    else if(type=='puran-katha')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=71&date='+this.dateTime+'&_embed';
    }
    else if(type=='photography')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=70&date='+this.dateTime+'&_embed';
    }
    else if(type=='jibon-kahini')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=73&date='+this.dateTime+'&_embed';
    }
    else if(type=='desh-bidesh')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=72&date='+this.dateTime+'&_embed';
    }
    else if(type=='fitness')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=74&date='+this.dateTime+'&_embed';
    }
    else if(type=='book-review')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=78&date='+this.dateTime+'&_embed';
    }
    else if(type=='hashir-golpo')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=77&date='+this.dateTime+'&_embed';
    }
    else if(type=='moner-katha')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=76&date='+this.dateTime+'&_embed';
    }
    else if(type=='beginners-guide')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=79&date='+this.dateTime+'&_embed';
    }
    else if(type=='inspiration')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=80&date='+this.dateTime+'&_embed';
    }
    else if(type=='aalap')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=69&date='+this.dateTime+'&_embed';
    }
    else if(type=='fashion')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=81&date='+this.dateTime+'&_embed';
    }
    else if(type=='bises-sonkhya')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=29&date='+this.dateTime+'&_embed';
    }
    else if(type=='puja-sonkhya')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&tag=puja-2019&date='+this.dateTime+'&_embed';
    }
    else if(type=='news')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=65&date='+this.dateTime+'&_embed';
    }
    else if(type=='announcement')
    {
       this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&category=66&date='+this.dateTime+'&_embed';
    } 
    else
    {
    	this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+paged+'&posts_per_page='+posts_per_page+'&tag=V2&date='+this.dateTime+'&_embed';
    } 
    console.log(this.url);
    
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listCategories(per_page:any, page:any)
  {
    
    this.dateTime = new Date().getTime();
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'categories?date='+this.dateTime;
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listCategoryPosts(cat_id:any, per_page:any, page:any)
  {
  	//this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
  	this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+page+'&posts_per_page='+per_page+'&category='+cat_id+'&date='+this.dateTime;
    
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listTagPosts(tag:any, per_page:any, page:any)
  {
    //this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+page+'&posts_per_page='+per_page+'&tag='+tag+'&date='+this.dateTime;
    
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listSeries()
  {
    //this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
    //this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+page+'&posts_per_page='+per_page+'&tag='+tag+'&date='+this.dateTime;
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'series?date='+this.dateTime;
    
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listSeriesPosts(series_slug:any, per_page:any, page:any)
  {
    //this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
    //this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?paged='+page+'&posts_per_page='+per_page+'&tag='+tag+'&date='+this.dateTime;
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'series_posts?series_slug='+series_slug+'&paged='+page+'&posts_per_page='+per_page+'&date='+this.dateTime;
    
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listSearchPosts(searchText:any, per_page:any, page:any)
  {
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'filtered_posts?search_title_like='+searchText+'&paged='+page+'&posts_per_page='+per_page+'&date='+this.dateTime;
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }



  listUsers(type:any, per_page:any, page:any)
  {
    console.log(type);
    if(type=='author')
    {
      this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'authors?'+'date='+this.dateTime;
    }
    else
    {
       this.url = Config.WORDPRESS_REST_API_URL+'users?page='+page+'&per_page='+per_page+'&date='+this.dateTime;
    }
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listAuthorPosts(author_id:any, per_page:any, page:any)
  {
    //this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
    this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'author_posts/?author_id='+author_id+'&paged='+page+'&posts_per_page='+per_page+'&date='+this.dateTime;
    
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }



}
