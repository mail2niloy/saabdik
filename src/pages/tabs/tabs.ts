import { Component } from '@angular/core';

import { AboutPage } from '../about/about';
import { CategoryPage } from '../category/category';
import { HomePage } from '../home/home';
import { MenuPage } from '../menu/menu';
import { AudioPlayerPage } from '../audio-player/audio-player';

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab1Root = HomePage;
  tab2Root = CategoryPage;
  tab3Root = AudioPlayerPage;
  tab4Root = MenuPage;

  constructor() {

  }
}
