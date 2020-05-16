import { Injectable } from '@angular/core';
import { HttpClient , HttpHeaders }  from '@angular/common/http';
import * as Config from '../config';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/forkJoin';

@Injectable()
export class WordpressService {
  dateTime : any;
  constructor(public http: HttpClient){
    
  }

  getRecentPosts(categoryId:number, page:number = 1){
    //if we want to query posts by category
    let category_url = categoryId? ("&categories=" + categoryId): "";

    return this.http.get(
      Config.WORDPRESS_REST_API_URL
      + 'posts?page=' + page
      + category_url)
    .map(res => res);

  }

  getComments(postId:number, page:number = 1){
    this.dateTime = new Date();
    console.log(postId+'---'+page+'----'+this.dateTime);
    return this.http.get(
      Config.WORDPRESS_REST_API_URL
      + "comments?dateTime="+this.dateTime+"&post=" + postId
      + '&page=' + page)
    .map(res => res);
  }

  getAuthor(author){
    return this.http.get(Config.WORDPRESS_REST_API_URL + "users/" + author)
    .map(res => res);
  }

  getPostCategories(post){
    let observableBatch = [];

    post.categories.forEach(category => {
      observableBatch.push(this.getCategory(category));
    });

    return Observable.forkJoin(observableBatch);
  }

  getCategory(category){
    return this.http.get(Config.WORDPRESS_REST_API_URL + "categories/" + category)
    .map(res => res);
  }

  createComment(postId, user, comment){
    let header: HttpHeaders = new HttpHeaders();
    header.append('Authorization', 'Bearer ' + user.token);

    return this.http.post(Config.WORDPRESS_REST_API_URL + "comments?token=" + user.token, {
      author_name: user.displayname,
      author_email: user.email,
      post: postId,
      content: comment
    },{ headers: header })
    .map(res => res);
  }
}
