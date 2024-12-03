pipeline {
    agent any

    environment {
        REQUIREMENTS_DIR = '/opt/tmarks-agent-from-scratch'  // Directory containing requirements.txt
        REQUIREMENTS_FILE = "${REQUIREMENTS_DIR}/requirements.txt"
        VENV_PATH = "${REQUIREMENTS_DIR}/.venv"  // Path for the virtual environment
        PYTHON_SCRIPT_PATH = "${REQUIREMENTS_DIR}/main.py"
    }

    stages {
        stage('Setup') {
            steps {
                script {
                    // Extract PR number and repository name
                    def prNumber = env.CHANGE_ID ?: 'unknown' // Provided by GitHub Plugin
                    def repoName = env.GIT_URL.tokenize('/').last().replace('.git', '') ?: 'unknown'
                    
                    // Save to environment variables for subsequent stages
                    env.PR_NUMBER = prNumber
                    env.REPO_NAME = repoName

                    echo "Detected PR Number: ${prNumber}"
                    echo "Detected Repository Name: ${repoName}"
                }
            }
        }
        stage('Install Dependencies') {
            steps {
                script {
                    sh '''
                    # Navigate to the requirements directory
                    cd ${REQUIREMENTS_DIR}
                    
                    # Set up Python virtual environment in the same directory as requirements.txt
                    /usr/bin/python3 -m venv .venv
                    
                    # Activate virtual environment and install dependencies
                    . .venv/bin/activate
                    pip install --upgrade pip
                    pip install -r requirements.txt
                    '''
                }
            }
        }
        stage('Code Review') {
            steps {
                script {
                    sh '''
                    # Navigate to the requirements directory
                    cd ${REQUIREMENTS_DIR}
                    
                    # Activate the virtual environment and run the Python script
                    . .venv/bin/activate
                    python main.py --pr_number ${PR_NUMBER} --repo_name ${REPO_NAME}
                    '''
                }
            }
        }
    }
}
