import { NgModule } from '@angular/core';
import { CommonHeaderComponent } from './common-header/common-header';
import { CommonSideMenuComponent } from './common-side-menu/common-side-menu';
import { ProgressBarComponent } from './progress-bar/progress-bar';
@NgModule({
	declarations: [CommonHeaderComponent,
    CommonSideMenuComponent,
    ProgressBarComponent],
	imports: [],
	exports: [CommonHeaderComponent,
    CommonSideMenuComponent,
    ProgressBarComponent]
})
export class ComponentsModule {}
