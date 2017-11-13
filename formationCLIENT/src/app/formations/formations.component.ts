import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { Formation } from '../formation';
import { FORMATIONS } from '../mock-formations';

@Component({
  selector: 'app-formations',
  templateUrl: './formations.component.html',
  styleUrls: ['./formations.component.css'],
  encapsulation: ViewEncapsulation.None
})
export class FormationsComponent implements OnInit {
  formations = FORMATIONS;

  constructor() { }

  ngOnInit() {
  }

}
