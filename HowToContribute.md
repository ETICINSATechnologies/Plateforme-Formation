# How to contribute

## First step
- Fork this project on GitHub
- Clone the forked project (which is on your GitHub profile) :
```
$ git clone https://github.com/<your-nickname>/Plateforme-Formation.git
$ cd Plateforme-Formation
```
- Link with the original remote repository for future synchronization :
```
$ git remote add upstream https://github.com/ETICINSATechnologies/Plateforme-Formation.git
```

## Make changes
- (Add your name on the Trello ticket and move it to "Work in Progress")
- Create a new branch with a suitable name :
```
$ git branch <branch-name>
$ git checkout <branch-name>

or more simply :

$ git checkout -b <branch-name>
```
- Make changes like a boss
- Add all modified files (from project root) with :
```
$ git add .

or individually :

$ git add <path-to-file-1> <path-to-file-2>
```
- Commit with a suitable message :
```
$ git commit -m "<suitable-commit-message>"
```
- Push the commit on your forked repository with :
```
$ git push origin <branch-name>
```
- Create a Pull Request on GitHub (you'll directly see a button) with a resume of your changes **AND please add the Project Manager and the Head Front/Back Dev as reviewers**
- (Move the Trello ticket on "Pull Request in reviewing")
- Wait and be ready to make more changes after review !

## Sync with the original repo
> "A sync a day keeps the rebase away" -Random Chinese guy, 2k17
- Pull (= fetch + merge) new content (most of the time the branch name is **master**) with :
```
$ git pull upstream <branch-name>

or

$ git fetch upstream
$ git merge upstream <branch-name>
```
- Push changes to your forked repo :
```
$ git push origin <branch-name>
```

## Useful commands
- Show the working tree status (added/modified/deleted files, ..) on current branch :
```
$ git status
```
- Show commit log
```
$ git log
```

## Handle merge errors with **rebase**
- Coming soon..
