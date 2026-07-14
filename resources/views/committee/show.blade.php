@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>مراجعة المشروع #{{ $project->id }}</h2>
        <a href="{{ route('committee.index') }}" class="btn btn-secondary">عودة للقائمة</a>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 بيانات المشروع للمراجعة</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>عنوان المشروع:</strong> {{ $project->title }}
                </div>
                <div class="col-md-6">
                    <strong>صاحب المشروع:</strong> {{ $project->owner->name }}
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>نسبة الضرر المبلغ عنها:</strong> 
                    <span class="badge bg-warning text-dark fs-6">{{ $project->damage_percentage ?? 0 }}%</span>
                </div>
                <div class="col-md-6">
                    <strong>حالة المشروع الحالية:</strong> 
                    <span class="badge bg-secondary fs-6">{{ $project->status }}</span>
                </div>
            </div>

            <div class="mb-3">
                <strong>القصة / وصف الحالة:</strong>
                <div class="border p-3 rounded bg-light mt-2">
                    {{ $project->story ?? $project->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">⚖️ قرار اللجنة</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('committee.review', $project) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="notes" class="form-label fw-bold">ملاحظات المراجعة (سبب الرفض أو ملاحظات على النسب والضرر)</label>
                    <textarea name="notes" id="notes" class="form-control" rows="4" placeholder="اكتب ملاحظاتك التفصيلية هنا...">{{ old('notes', $project->verification?->notes) }}</textarea>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" name="status" value="approved" class="btn btn-success btn-lg px-4">
                        ✅ اعتماد المشروع
                    </button>
                    <button type="submit" name="status" value="rejected" class="btn btn-danger btn-lg px-4">
                        ❌ رفض المشروع
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection