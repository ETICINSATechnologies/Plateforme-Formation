import { InMemoryDbService } from 'angular-in-memory-web-api';

export class InMemoryFormationDataService implements InMemoryDbService {
  createDb() {
    const formations = [
      {id: 1, name: 'angular4', icon: '../assets/angular-logo.jpg'},
      {id: 2, name: 'git', icon: '../assets/git-logo.png'}
    ];
    return {formations};
  }
}
