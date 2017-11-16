import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Rx';
import { HttpClient, HttpHeaders} from '@angular/common/http';
import { catchError, map, tap } from 'rxjs/operators';
import {of} from "rxjs/observable/of";

import { Formation } from '../objects/formation';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable()
export class FormationService {

  constructor( private http: HttpClient) { }

  private formationsUrl = 'api/formations';  // URL to web api


  /**
   * Get the formations from the server.
   * @returns {Observable<Formation[]>}
   */
  getListFormations(): Observable<Formation[]> {
    return this.http.get<Formation[]>(this.formationsUrl).pipe(
      catchError(this.handleError('getListFormations',[]))
      );
  }

  /**
   * GET hero by id. Will 404 if id not found
   * @param {number} id
   * @returns {Observable<Formation>}
   */
  getFormation(id: number): Observable<Formation> {
    const url = `${this.formationsUrl}/${id}`;
    return this.http.get<Formation>(url).pipe(
      catchError(this.handleError<Formation>(`getFormation id=${id}`))
    );
  }

  /**
   * Put: Update the formation on the server
   * @param {Formation} formation
   * @returns {Observable<any>}
   */
  updateFormation (formation: Formation): Observable<any> {
    return this.http.put(this.formationsUrl, formation, httpOptions).pipe(
      catchError(this.handleError<any>('updateFormation'))
    );
  }

  /**
   * Post: add a new formation on the server
   * @param {Formation} formation
   * @returns {Observable<Formation>}
   */
  addFormation (formation: Formation): Observable<Formation> {
    return this.http.post<Formation>(this.formationsUrl, formation, httpOptions).pipe(
      catchError(this.handleError<Formation>('addFormation'))
    );
  }

  /**
   * Delete: delete the formation from the server
   * @param {Formation | number} formation
   * @returns {Observable<Formation>}
   */
  deleteFormation (formation: Formation | number): Observable<Formation> {
    const id = typeof formation === 'number' ? formation : formation.id;
    const url = `${this.formationsUrl}/${id}`;

    return this.http.delete<Formation>(url, httpOptions).pipe(
      catchError(this.handleError<Formation>('deleteFormation'))
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
