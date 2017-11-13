import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {SuiModule} from 'ng2-semantic-ui';
import { RouterModule, Routes} from '@angular/router';

import { AppComponent } from './app.component';
import { FormationsComponent } from './formations/formations.component';
import { HomeComponent } from './home/home.component';


@NgModule({
  declarations: [
    AppComponent,
    FormationsComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
    SuiModule,
    RouterModule.forRoot([
      {path: 'home', component: HomeComponent},
      {path: 'formations', component: FormationsComponent}
    ])
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
