import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Formation } from '../../objects/formation';
import { FormationService } from '../../services/formation.service';

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
    this.getListFormations();
  }

  getListFormations(): void {
    this.formationService.getListFormations().subscribe(formations => this.formations = formations);
  }

  add(name: string): void {
    name = name.trim();
    if (!name) { return; }
    this.formationService.addFormation({ id: null, name: name, icon: '../assets/angular-logo.jpg' } as Formation)
      .subscribe(formation => {
        this.formations.push(formation);
      });
  }

  delete(formation: Formation): void {
    this.formations = this.formations.filter(f => f !== formation);
    this.formationService.deleteFormation(formation).subscribe();
  }
}
