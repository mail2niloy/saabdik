import { Injectable } from '@angular/core';
import { HttpClient , HttpHeaders }  from '@angular/common/http';
import * as Config from '../config';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/forkJoin';

@Injectable()
export class WordpressService {
  dateTime : any;
  url : any;
  constructor(public http: HttpClient){
    
  }

  getPostDetails(post_id:any)
  {
    this.dateTime = new Date().getTime();
    this.url = Config.WORDPRESS_REST_API_URL+'posts/'+post_id+'/?date='+this.dateTime;
    console.log(this.url);
    return this.http.get(this.url).map(res => res )
                                  .catch(error => error);
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
    this.dateTime = new Date().getTime();
    //console.log(postId+'---'+page+'----'+this.dateTime);
    console.log(
      Config.WORDPRESS_REST_API_URL
      + "comments?dateTime="+this.dateTime+"&post=" + postId
      + '&page=' + page);
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

  getLikes(post_id){
    this.dateTime = new Date().getTime();
    console.log(Config.WORDPRESS_CUSTOM_LIKE_REST_API_URL + "get_post_likes/?post_id=" + post_id);
    return this.http.get(Config.WORDPRESS_CUSTOM_LIKE_REST_API_URL + "get_post_likes/?dateTime="+this.dateTime+"&post_id=" + post_id)
    .map(res => res);
  }
  getLibraryInfo(post_id){
    this.dateTime = new Date().getTime();
    console.log(Config.WORDPRESS_CUSTOM_LIBRARY_REST_API_URL + "get_library_info/?post_id=" + post_id);
    return this.http.get(Config.WORDPRESS_CUSTOM_LIBRARY_REST_API_URL + "get_library_info/?post_id=" + post_id+"&dateTime="+this.dateTime)
    .map(res => res);
  }
  addToLibrary(user_email, post_id){
    this.dateTime = new Date().getTime();
    console.log(Config.WORDPRESS_CUSTOM_LIBRARY_REST_API_URL + "add_to_library/?user_email=" + user_email+"&post_id=" + post_id);
    return this.http.post(Config.WORDPRESS_CUSTOM_LIBRARY_REST_API_URL + "add_to_library", {
      user_email: user_email,
      post_id: post_id
    }).map(res => res);
  }

  likePost(post_id, user_email){
    console.log(Config.WORDPRESS_CUSTOM_LIKE_REST_API_URL + "insert_post_like/?user_email=" + user_email+"&post_id=" + post_id);
    
    return this.http.post(Config.WORDPRESS_CUSTOM_LIKE_REST_API_URL + "insert_post_like", {
      user_email: user_email,
      post_id: post_id
    }).map(res => res);
  }

  getPostCategories(post_categories){
    let observableBatch = [];
    console.log(JSON.stringify(post_categories));
    post_categories.forEach(category => {
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
    console.log('token ' + user.token+' name ' + user.name+' email ' + user.email);
    return this.http.post(Config.WORDPRESS_REST_API_URL + "comments?token=" + user.token, {
      author_name: user.name,
      author_email: user.email,
      post: postId,
      content: comment
    },{ headers: header })
    .map(res => res);
  }
}
