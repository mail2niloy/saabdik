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


  listPosts(type:any, per_page:any, page:any):Observable<any>
  {
    
    //this.dateTime = new Date().getTime();
    this.dateTime = "";
    
    if(type=='popular')
    {
      this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[tag]=popular&date='+this.dateTime+'&_embed';
    }
    else if(type=='chotogolpo')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=3&date='+this.dateTime+'&_embed';
    }
    else if(type=='onugolpo')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=28&date='+this.dateTime+'&_embed';
    }
    else if(type=='bises-rochona')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=12&date='+this.dateTime+'&_embed';
    }
    else if(type=='kobita')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=6&date='+this.dateTime+'&_embed';
    }
    else if(type=='dharabahik-rachona')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=21&date='+this.dateTime+'&_embed';
    }
    else if(type=='bhraman')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=15&date='+this.dateTime+'&_embed';
    }
    else if(type=='khalar-dunia')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=7&date='+this.dateTime+'&_embed';
    }
    else if(type=='rahoshyo-golpo')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=4&date='+this.dateTime+'&_embed';
    }
    else if(type=='bhuter-golpo')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=44&date='+this.dateTime+'&_embed';
    }
    else if(type=='itihaser-patai')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=8&date='+this.dateTime+'&_embed';
    }
    else if(type=='life-style')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=67&date='+this.dateTime+'&_embed';
    }
    else if(type=='heseler-katha')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=10&date='+this.dateTime+'&_embed';
    }
    else if(type=='puran-katha')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=71&date='+this.dateTime+'&_embed';
    }
    else if(type=='photography')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=70&date='+this.dateTime+'&_embed';
    }
    else if(type=='jibon-kahini')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=73&date='+this.dateTime+'&_embed';
    }
    else if(type=='desh-bidesh')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=72&date='+this.dateTime+'&_embed';
    }
    else if(type=='fitness')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=74&date='+this.dateTime+'&_embed';
    }
    else if(type=='book-review')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=78&date='+this.dateTime+'&_embed';
    }
    else if(type=='hashir-golpo')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=77&date='+this.dateTime+'&_embed';
    }
    else if(type=='moner-katha')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=76&date='+this.dateTime+'&_embed';
    }
    else if(type=='beginners-guide')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=79&date='+this.dateTime+'&_embed';
    }
    else if(type=='inspiration')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=80&date='+this.dateTime+'&_embed';
    }
    else if(type=='aalap')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=69&date='+this.dateTime+'&_embed';
    }
    else if(type=='fashion')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=81&date='+this.dateTime+'&_embed';
    }
    else if(type=='bises-sonkhya')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=29&date='+this.dateTime+'&_embed';
    }
    else if(type=='puja-sonkhya')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[tag]=puja-2019&date='+this.dateTime+'&_embed';
    }
    else if(type=='news')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=65&date='+this.dateTime+'&_embed';
    }
    else if(type=='announcement')
    {
       this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]=66&date='+this.dateTime+'&_embed';
    } 
    else
    {
    	this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[tag]=V2&date='+this.dateTime+'&_embed';
    } 
    console.log(this.url);
    
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listCategories(per_page:any, page:any)
  {
    
    this.url = Config.WORDPRESS_REST_API_URL+'categories?page='+page+'&per_page='+per_page+'&_embed';
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listCategoryPosts(cat_id:any, per_page:any, page:any)
  {
  	this.url = Config.WORDPRESS_REST_API_URL+'posts?page='+page+'&per_page='+per_page+'&filter[cat]='+cat_id+'&date='+this.dateTime+'&_embed';
  	console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listSearchPosts(searchText:any, per_page:any, page:any)
  {
    this.url = Config.WORDPRESS_REST_API_URL+'posts?search='+searchText+'&page='+page+'&per_page='+per_page+'&date='+this.dateTime+'&_embed';
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

  listUsers(type:any, per_page:any, page:any)
  {
    console.log(type);
    if(type=='author')
    {
      this.url = Config.WORDPRESS_SAABDIK_REST_API_URL+'authors';
    }
    else
    {
       this.url = Config.WORDPRESS_REST_API_URL+'users?page='+page+'&per_page='+per_page+'&date='+this.dateTime;
    }
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
  }

}
