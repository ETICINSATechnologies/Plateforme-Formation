import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Rx';
import { of } from 'rxjs/observable/of';

import { Formation } from './formation';
import { FORMATIONS} from '../mock/mock-formations';

@Injectable()
export class FormationService {

  constructor() { }

  getListFormations(): Observable<Formation[]> {
    return of(FORMATIONS);
  }

}
