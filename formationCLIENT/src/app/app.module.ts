import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {SuiModule} from 'ng2-semantic-ui';
import { RouterModule, Routes} from '@angular/router';
import { HttpClientModule }    from '@angular/common/http';
import { HttpClientInMemoryWebApiModule } from 'angular-in-memory-web-api';
import { InMemoryFormationDataService }  from './in_memory_data/InMemoryFormationDataService'

import { AppComponent } from './app.component';
import { FormationsComponent } from './components/formations/formations.component';
import { HomeComponent } from './components/home/home.component';
import {FormationService} from './services/formation.service';

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
    ]),
    HttpClientModule,
    // The HttpClientInMemoryWebApiModule module intercepts HTTP requests
    // and returns simulated server responses.
    // Remove it when a real server is ready to receive requests.
    HttpClientInMemoryWebApiModule.forRoot(
      InMemoryFormationDataService, { dataEncapsulation: false }
    )
  ],
  providers: [ FormationService ],
  bootstrap: [AppComponent]
})
export class AppModule { }
