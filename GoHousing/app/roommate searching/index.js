Survey
    .StylesManager
    .applyTheme("default");

var json = {
    triggers: [
        {
            type: "complete",
            name: "exit",
            operator: "notempty",
            value: "Yes"
        }
    ],
    pages: [
        {
            questions: [
              {
                    type: "rating",
                    name: "sharedplace",
                    title: "Rate how you prefer your shared living area:",
                    isRequired: true,
                    mininumRateDescription: "Neat & Clean",
                    maximumRateDescription: "Messy & Disorganized"
                }, {
                    type: "rating",
                    name: "personality",
                    title: "Do you consider yourself:",
                    isRequired: true,
                    mininumRateDescription: "Shy",
                    maximumRateDescription: "Outgoing"
                },  {
                    type: "radiogroup",
                    name: "how to clean",
                    title: "How do you tipically clean:",
                    isRequired: true,
                    choices: ["Clean right away", "Clean before I go to bed", "I wait a few days"]
                }, {
                    type: "radiogroup",
                    name: "present",
                    title: "I will probably be at my apartment:",
                    isRequired: true,
                    choices: ["A majority of the time", "I may be gone most weekends", "I will hardly be home"]
                },  {
                    type: "radiogroup",
                    name: "alcohol use",
                    title: "Describe your alcohol use:",
                    isRequired: true,
                    choices: ["Never", "A few times a month", "1-2 days per week","3-5 days per week", "6-7 days per week"]
                },  {
                    type: "radiogroup",
                    name: "alcohol use",
                    title: "Do you mind if your roommates drink?",
                    isRequired: true,
                    choices: ["Prefer no alcohol", "1-3 times per week", "Anytime"]
                },  {
                    type: "radiogroup",
                    name: "smoke",
                    title: "Do you somke?",
                    isRequired: true,
                    choices: ["Yes", "No"]
                },  {
                    type: "radiogroup",
                    name: "roommate smoke",
                    title: "Do you mind if your roommates are smokers?",
                    isRequired: true,
                    choices: ["Yes", "No"]
                },   {
                    type: "radiogroup",
                    name: "guests",
                    title: "How often do you plan on having guests in the apartment?",
                    isRequired: true,
                    choices: ["Never", "A few times a month", "1-2 days per week","3-5 days per week", "6-7 days per week"]
                },   {
                    type: "radiogroup",
                    name: "roommate guests",
                    title: "How often may you roommates have guests in the apartment?",
                    isRequired: true,
                    choices: ["Prefer no guests", "1-3 times per week", "Anytime"]
                },  {
                    type: "radiogroup",
                    name: "day time",
                    title: "When do you start your day?",
                    isRequired: true,
                    choices: ["In the morning", "At noon", "After noon"]
                }, {
                    type: "radiogroup",
                    name: "night time",
                    title: "When do you typically go to bed?",
                    isRequired: true,
                    choices: ["Before 10pm","Before midnight","After midnight"]
                },  {
                    type: "comment",
                    name: "suggestions",
                    title: "Please write any other concerns you have for your future roommates."
                }
            ]
        }
    ]
};

window.survey = new Survey.Model(json);

survey
    .onComplete
    .add(function (result) {
         document
             .querySelector('#surveyResult')
             .innerHTML = "result: " + JSON.stringify(result.data);
        setTimeout(function() {
            survey.clear(false, true);
            window.location.href = "roommate searching.php";
        }, 1000);

    });


survey.data = {
    'sharedplace': '4',
    'personality': '4',
    'how to clean': 'Clean before I go to bed',
    'present': 'A majority of the time',
    'alcohol use': 'Never',
    'smoke':'yes',
    'roommate smoke':'yes',
    'guests':'Never',
    'roommate guests':'Anytime',
    'day time':'At noon',
    'night time':'Before 10pm',
    'suggestions':''

};
survey.mode = 'display';


/*//Use getValue to get the value of the question
survey.getValue('questionName');
//Use setValue to set the value of the question
survey.setValue('questionName', newValue);
//Use data property to get/set survey data as json
survey.data = {"youquestion1": value1, "youquestionN":valueN};
//Use onValueChanged event to get a notification on chaning question value.
survey.onValueChanged.add(function (sender, options) {
    var mySurvey = sender;
    var questionName = options.name;
    var newValue = options.value;
});
//Use onComplete to get survey.data to pass it to the server.
survey.onComplete.add(function (sender) {
    var mySurvey = sender;
    var surveyData = sender.data;
});*/

$("#surveyElement").Survey({model: survey});
