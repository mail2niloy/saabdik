import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { HttpClientModule } from '@angular/common/http';
import { MyApp } from './app.component';
import { GooglePlus } from '@ionic-native/google-plus/ngx';
import { StreamingMedia } from '@ionic-native/streaming-media/ngx';
import { Media, MediaObject } from '@ionic-native/media/ngx';
import { IonicStorageModule } from '@ionic/storage';


import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { CategoryPage } from '../pages/category/category';
import { TabsPage } from '../pages/tabs/tabs';
import { ReadPage } from '../pages/read/read';
import { PostsPage } from '../pages/posts/posts';
import { MenuPage } from '../pages/menu/menu';
import { SearchPage } from '../pages/search/search';
import { LoginPage } from '../pages/login/login';
import { ProfilePage } from '../pages/profile/profile';
import { MembershipPage } from '../pages/membership/membership';
import { AudioPlayerPage } from '../pages/audio-player/audio-player';
import { AuthorPage } from '../pages/author/author';

import { CommonHeaderComponent } from '../components/common-header/common-header';
import { CommonSideMenuComponent } from '../components/common-side-menu/common-side-menu';

import { NativeStorage } from '@ionic-native/native-storage/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { RemoteDataProvider } from '../providers/remote-data/remote-data';
import { WordpressService } from '../services/wordpress.service';
import { AuthenticationService } from '../services/authentication.service';
import { SocialSharing } from '@ionic-native/social-sharing/ngx';
import { BasicService } from '../services/basic.service';

import { IonicAudioModule, WebAudioProvider, CordovaMediaProvider, defaultAudioProviderFactory } from 'ionic-audio3';

/**
 * Sample custom factory function to use with ionic-audio3
 */
export function myCustomAudioProviderFactory() {
  return (window.hasOwnProperty('cordova')) ? new CordovaMediaProvider() : new WebAudioProvider();
}





@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    CategoryPage,
    ReadPage,
    AuthorPage,
    PostsPage,
    MenuPage,
    SearchPage,
    LoginPage,
    ProfilePage,
    MembershipPage,
    AudioPlayerPage,
    TabsPage,
    CommonHeaderComponent,
    CommonSideMenuComponent
    
  ],
  imports: [
    BrowserModule,    
    HttpClientModule,
    IonicModule.forRoot(MyApp),
    IonicStorageModule.forRoot(),
    IonicAudioModule.forRoot(defaultAudioProviderFactory)
    ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    CategoryPage,
    ReadPage,
    AuthorPage,
    PostsPage,
    MenuPage,
    SearchPage,
    LoginPage,
    ProfilePage,
    MembershipPage,
    AudioPlayerPage,
    TabsPage,
    CommonHeaderComponent,
    CommonSideMenuComponent
  ],
  providers: [
    GooglePlus,    
    NativeStorage,
    StatusBar,
    SplashScreen,
    WordpressService,
    AuthenticationService,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    RemoteDataProvider,
    SocialSharing,
    BasicService,
    StreamingMedia,
    Media
  ]
})
export class AppModule {}
