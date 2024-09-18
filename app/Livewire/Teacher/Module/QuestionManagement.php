<?php

namespace App\Livewire\Teacher\Module;

use App\Models\Module;
use App\Models\QuisAnswer;
use App\Models\QuisQuestion;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class QuestionManagement extends Component
{

    use WithPagination;

    public $classId;
    public $moduleId;
    public $search = "";

    #[Validate('required')]
    public $questionText = "";

    #[Validate('required')]
    public $option1 = "";

    #[Validate('required')]
    public $option2 = "";

    #[Validate('required')]
    public $option3 = "";

    #[Validate('required')]
    public $option4 = "";

    #[Validate('required')] // gunakan 1, 2, 3, 4
    public $nomorUrutJawaban = "1";

    public $questId;

    public function setAnswer(String $answer)
    {
        $this->nomorUrutJawaban = $answer;
    }

    public function addQuestion()
    {
        try {
            DB::beginTransaction();
            $question = QuisQuestion::create([
                'module_id' => $this->moduleId,
                'text' => $this->questionText
            ]);

            QuisAnswer::create([
                'question_id' => $question->id,
                'text' => $this->option1,
                'order' => 1,
                'status' => ("1" == $this->nomorUrutJawaban),
            ]);
            QuisAnswer::create([
                'question_id' => $question->id,
                'text' => $this->option2,
                'order' => 2,
                'status' => ("2" == $this->nomorUrutJawaban),
            ]);
            QuisAnswer::create([
                'question_id' => $question->id,
                'text' => $this->option3,
                'order' => 3,
                'status' => ("3" == $this->nomorUrutJawaban),
            ]);
            QuisAnswer::create([
                'question_id' => $question->id,
                'text' => $this->option4,
                'order' => 4,
                'status' => ("4" == $this->nomorUrutJawaban),
            ]);

            DB::commit();

            $this->reset(['questionText', 'option1', 'option2', 'option3', 'option4', 'nomorUrutJawaban']);
            $this->dispatch('close-modal', modalId: 'addQuestionModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Soal berhasil dibuat');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->reset(['questionText', 'option1', 'option2', 'option3', 'option4', 'nomorUrutJawaban']);
            $this->dispatch('close-modal', modalId: 'addQuestionModal');
            $this->dispatch('sweet-alert', icon: 'error', title: 'Gagal membuat soal');
        }
    }

    public function editQuestion($questId)
    {
        $question = QuisQuestion::find($questId);
        $quis_answers = $question->quis_answers()->get();
        $this->questId = $questId;

        $this->questionText = $question->text;
        $this->option1 = $quis_answers[0]->text;
        $this->option2 = $quis_answers[1]->text;
        $this->option3 = $quis_answers[2]->text;
        $this->option4 = $quis_answers[3]->text;

        foreach ($quis_answers as $key => $answer) {
            if ($answer->status) {
                $this->nomorUrutJawaban = $key + 1;
            }
        }
    }

    public function updateQuestion()
    {
        try {
            DB::beginTransaction();

            $question = QuisQuestion::findOrFail($this->questId);

            $question->update([
                'text' => $this->questionText,
            ]);

            $answersData = [
                ['text' => $this->option1, 'order' => 1, 'status' => ("1" == $this->nomorUrutJawaban)],
                ['text' => $this->option2, 'order' => 2, 'status' => ("2" == $this->nomorUrutJawaban)],
                ['text' => $this->option3, 'order' => 3, 'status' => ("3" == $this->nomorUrutJawaban)],
                ['text' => $this->option4, 'order' => 4, 'status' => ("4" == $this->nomorUrutJawaban)],
            ];

            foreach ($answersData as $data) {
                QuisAnswer::updateOrCreate(
                    ['question_id' => $this->questId, 'order' => $data['order']],
                    ['text' => $data['text'], 'status' => $data['status']]
                );
            }

            DB::commit();

            $this->reset(['questId', 'questionText', 'option1', 'option2', 'option3', 'option4', 'nomorUrutJawaban']);
            $this->dispatch('close-modal', modalId: 'editQuestionModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Soal berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->reset(['questId', 'questionText', 'option1', 'option2', 'option3', 'option4', 'nomorUrutJawaban']);
            $this->dispatch('close-modal', modalId: 'editQuestionModal');
            $this->dispatch('sweet-alert', icon: 'error', title: 'Soal gagal diubah');
        }
    }


    public function deleteQuestion($questId)
    {
        $this->questId = $questId;
    }

    public function destroyQuestion()
    {
        try {
            $quest = QuisQuestion::findOrFail($this->questId);
            $quest->delete();
            $this->reset('questId');
            $this->dispatch('close-modal', modalId: 'deleteQuestConfirmModal');
            $this->dispatch('sweet-alert', icon: 'success', title: 'Soal berhasil dihapus');
        } catch (\Throwable $th) {
            $this->reset('questId');
            $this->dispatch('close-modal', modalId: 'deleteQuestConfirmModal');
            $this->dispatch('sweet-alert', icon: 'error', title: 'Soal gagal dibuat');
        }
    }

    public function resetProperty()
    {
        $this->reset(['questId', 'questionText', 'option1', 'option2', 'option3', 'option4', 'nomorUrutJawaban']);
    }

    public function render()
    {
        $module = Module::with("classes")->find($this->moduleId);
        $questions = Module::find($this->moduleId)->questions()->with("quis_answers")
            ->where('quis_questions.text', 'like', '%' . $this->search . '%')
            ->paginate(2);
        return view('livewire.teacher.module.question-management', [
            'questions' => $questions,
            'module' => $module,
        ]);
    }

    public function rendered()
    {
        // menjalankan modal perlu menggunakan modal init ini.
        $this->dispatch('all:init');
    }
}
