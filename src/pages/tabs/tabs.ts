import { Component } from '@angular/core';

import { AboutPage } from '../about/about';
import { ContactPage } from '../contact/contact';
import { CategoryPage } from '../category/category';
import { HomePage } from '../home/home';
import { MenuPage } from '../menu/menu';

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab1Root = HomePage;
  tab2Root = CategoryPage;
  tab3Root = ContactPage;
  tab4Root = MenuPage;

  constructor() {

  }
}
