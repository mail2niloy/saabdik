import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { HttpClientModule } from '@angular/common/http';
import { MyApp } from './app.component';
import { GooglePlus } from '@ionic-native/google-plus';
import { AndroidPermissions } from '@ionic-native/android-permissions/ngx';
import { Diagnostic } from '@ionic-native/diagnostic/ngx';

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

import { CommonHeaderComponent } from '../components/common-header/common-header';
import { CommonSideMenuComponent } from '../components/common-side-menu/common-side-menu';

import { NativeStorage } from '@ionic-native/native-storage'
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { RemoteDataProvider } from '../providers/remote-data/remote-data';
import { WordpressService } from '../services/wordpress.service';
import { AuthenticationService } from '../services/authentication.service';
import { SocialSharing } from '@ionic-native/social-sharing';
import { BasicService } from '../services/basic.service';


@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    CategoryPage,
    ReadPage,
    PostsPage,
    MenuPage,
    SearchPage,
    LoginPage,
    ProfilePage,
    TabsPage,
    CommonHeaderComponent,
    CommonSideMenuComponent
  ],
  imports: [
    BrowserModule,    
    HttpClientModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    CategoryPage,
    ReadPage,
    PostsPage,
    MenuPage,
    SearchPage,
    LoginPage,
    ProfilePage,
    TabsPage,
    CommonHeaderComponent,
    CommonSideMenuComponent
  ],
  providers: [
    GooglePlus,    
    NativeStorage,
    Diagnostic,
    AndroidPermissions,
    StatusBar,
    SplashScreen,
    WordpressService,
    AuthenticationService,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    RemoteDataProvider,
    SocialSharing,
    BasicService
  ]
})
export class AppModule {}
