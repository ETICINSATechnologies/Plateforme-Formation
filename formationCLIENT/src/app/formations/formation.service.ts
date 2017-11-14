import { Injectable } from '@angular/core';

import { Formation } from './formation';
import { FORMATIONS} from '../mock/mock-formations';

@Injectable()
export class FormationService {

  constructor() { }

  getFormations(): Formation[] {
    return FORMATIONS;
  }

}
