pipeline {
  agent any
  stages {
    stage('build') {
      steps {
        git(url: 'https://github.com/aygunaydin/fizy-tikit', branch: 'master')
      }
    }
    stage('verify-index') {
      steps {
        fileExists 'index.php'
      }
    }
  }
}