pipeline {
    agent {
        label 'php-agent'
    }

    stages {
        stage('Install Dependencies') {
            steps {
                echo 'Installing PHP dependencies...'
                sh 'composer install --no-interaction'
            }
        }

        stage('Test') {
            steps {
                echo 'Running PHPUnit tests...'
                sh './vendor/bin/phpunit --testdox'
            }
        }
    }

    post {
        always {
            echo 'Pipeline completed.'
        }
        success {
            echo 'All stages completed successfully!'
        }
        failure {
            echo 'Errors detected in the pipeline.'
        }
    }
}
