import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Formation } from './formation';
import { FormationService } from './formation.service';

@Component({
  selector: 'app-formations',
  templateUrl: './formations.component.html',
  styleUrls: ['./formations.component.css'],
  encapsulation: ViewEncapsulation.None
})
export class FormationsComponent implements OnInit {
  formations: Formation[];

  constructor(private formationService: FormationService ) { }

  ngOnInit() {
    this.getFormations();
  }

  getFormations(): void {
    this.formations = this.formationService.getFormations();
  }
}
