import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Rx';
import { HttpClient} from '@angular/common/http';
import { catchError, map, tap } from 'rxjs/operators';
import {of} from "rxjs/observable/of";

import { Formation } from './formation';


@Injectable()
export class FormationService {

  constructor( private http: HttpClient) { }

  private formationsUrl = 'api/formations';  // URL to web api

  getListFormations(): Observable<Formation[]> {
    return this.http.get<Formation[]>(this.formationsUrl)
      .pipe(catchError(this.handleError('getListFormations',[]))
      );
  }

  /**
   * Handle Http operation that failed.
   * Let the app continue.
   * @param operation - name of the operation that failed
   * @param result - optional value to return as the observable result
   */
  private handleError<T> (operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {

      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }
}
