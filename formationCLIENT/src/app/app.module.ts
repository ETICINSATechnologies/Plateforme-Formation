import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {SuiModule} from 'ng2-semantic-ui';
import { RouterModule, Routes} from "@angular/router";

import { AppComponent } from './app.component';
import { FormationComponent } from './formation/formation.component';
import { HomeComponent } from './home/home.component';


@NgModule({
  declarations: [
    AppComponent,
    FormationComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
    SuiModule,
    RouterModule.forRoot([
      {path: 'home', component: HomeComponent},
      {path: 'foramtion', component: FormationComponent}
    ])
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
