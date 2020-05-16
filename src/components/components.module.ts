import { NgModule } from '@angular/core';
import { CommonHeaderComponent } from './common-header/common-header';
import { CommonSideMenuComponent } from './common-side-menu/common-side-menu';
@NgModule({
	declarations: [CommonHeaderComponent,
    CommonSideMenuComponent],
	imports: [],
	exports: [CommonHeaderComponent,
    CommonSideMenuComponent]
})
export class ComponentsModule {}
