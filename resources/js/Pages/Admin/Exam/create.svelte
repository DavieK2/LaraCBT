<script>

    import TextEditor from '../../../Shared/TextEditor.svelte';
    import Layout from '../../../Shared/Layout.svelte';
    import Input from '../../../Shared/Input.svelte';
    import Icon from '../../../Shared/Icon.svelte';
    import Questions from '../../../Shared/Questions.svelte';
    import { Inertia } from '@inertiajs/inertia';
    import { page } from '@inertiajs/inertia-svelte';
    

    $: errors = $page.props.errors;

    $: questions = $page.props.questions.data ?  $page.props.questions.data :  $page.props.questions ;

    let disabled = true;
    let disableClear = true;
    let question;
    let questionType;
    let questionId = null;
    let marks;
    let editor;
    let answers = ["", ""];
    let correctAnswer;


    const addChoice = (i) => answers = [...answers, i];

    const removeChoice = (index) => {
        answers =  answers.filter((answer, answerIndex) => answerIndex !== index);
        correctAnswer =  answers.indexOf(answers.find((value, answerIndex) => answerIndex === correctAnswer));
        correctAnswer < 0 ? correctAnswer = undefined : correctAnswer = correctAnswer;
    } 
    
    const handleAnswerInput = (e, index) => answers[index] = e.target.value;

    setTimeout(() => editor.quill.on('text-change', () => editor.quill.root.innerHTML === '<p><br></p>' ? question = undefined : question = editor.quill.root.innerHTML ), 1000);


    const reset = () => {

        editor.quill.root.innerHTML = '';
        question = null;
        questionType = "";
        answers = ["", ""];
        marks = null;
        questionId = null;
    }

    const saveQuestion = () => {

        let data = { 
            question, 
            questionType, 
            answers, 
            correctAnswer, 
            marks, 
            questionCategory: $page.props.questionCategory, 
            id: questionId, 
            examID: $page.props.exam_id 
        };

        Inertia.post('/create/question', data, {
            forceFormData: true,
            preserveScroll: true,
        });

    }

    const editQuestion = async (e) => {

        let questionsData = await fetch(`/edit/question/${e.detail.id}`);
        let { data } = await questionsData.json();
       
        question = data.question;
        editor.quill.root.innerHTML = question;
        questionType = data.questionType;
        answers = data.answers;
        correctAnswer = parseInt(data.correctAnswer);
        marks = parseInt(data.marks);
        questionId = data.id;
    }

    $: (question && questionType === "Multiple Choice Question" && correctAnswer >= 0 && marks && !answers.includes("")) || (question && questionType === "Short Answer Question" && marks)  ? disabled = false : disabled = true;
    $: question || questionType || correctAnswer || marks ? disableClear = false : disableClear = true;
    

</script>

<Layout>
    <div class="h-full w-full font-bold text-dark text-xl">
        <span>Exam Title: { $page.props.exam_title }</span>
    </div>
    <div class="my-10 pt-6 flex flex-row bg-white rounded-lg shadow w-full text-sm text-dark min-h-[25rem]">
        <div class="flex flex-col px-6 py-8 w-1/2">
            <span class="relative font-semibold text-sm w-full border-b border-gray-300 pb-4">
                <span class="text-lg">Add Questions</span>
                <span class="absolute -bottom-px left-0 h-1 w-10 bg-dark"></span>
            </span>
            <div class="mt-8 space-y-6">
                <div>
                    <TextEditor { errors } bind:this={ editor } showLabel="true" label="Enter a Question" id="question" name="question" />
                </div>
                <Input { errors } bind:value={ questionType } label="Select Question Type" id="questionType" type="select" name="questionType" style="w-full"> 
                    <option class="text-gray-300" value="">Select Question Type</option>
                    <option value="Multiple Choice Question">Multiple Choice Question</option>
                    <option value="Short Answer Question">Short Answer Question</option>
                </Input>
            </div>


            { #if questionType === 'Multiple Choice Question'}
                <div class="mt-6">
                    <span class="font-medium">Questions Options ( Select Correct Answer )</span>
                    <div class="mt-3 space-y-3">
                        { #each answers  as answer, index }
                            <div class="flex flex-row space-x-2">
                                <div class="flex items-center"><input bind:group={ correctAnswer } class="w-4 h-4" type="radio" name="choices" value={ index }></div>
                                <Input { errors } type="text" id={ index } name="answers[]" value={ answer } on:input={ (e) => handleAnswerInput(e, index) } />
                                { #if index > 1 }
                                    <button on:click={ () => removeChoice(index) } class="bg-red-100 rounded p-2"><Icon name="delete" styling="h-4 w-4 stroke-current text-red-400" /></button>
                                { /if }
                                { #if index == (answers.length - 1) }
                                    <button on:click={ () => addChoice("") } class="bg-blue-100 rounded p-2"><Icon name="plus" styling="h-4 w-4 stroke-current text-blue-400" /></button>
                                { /if }
                            </div>
                        { /each }
                    </div>
                    { #if errors.correctAnswer }
                        <div class="text-xs text-red-500 mt-2">{  errors.correctAnswer }</div>
                    { /if }
                </div>
            {/if}
            

            { #if questionType }
                <div class="mt-6">
                    <Input { errors } bind:value={ marks } showLabel="true" label="Enter Marks" id="question" name="marks" type="number" placeholder="Enter Marks" />
                </div>  
            {/if}
            


            <div class="flex space-x-2 items-center mt-6">
                <button on:click={ saveQuestion } { disabled } class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600 transition uppercase font-semibold disabled:bg-green-200 disabled:cursor-not-allowed">Save Question</button>
                <button on:click={ reset } disabled={ disableClear } class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition uppercase font-semibold disabled:bg-red-200 disabled:cursor-not-allowed">Clear</button>
            </div>
        </div>

        <Questions { questions } on:edit-question={ editQuestion } />
        

    </div>
</Layout>