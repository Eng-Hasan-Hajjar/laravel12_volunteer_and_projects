<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\DiagnosisLog;   // ← هذا كان ناقصاً
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

   public function show()
    {
        $user = auth()->user();
 
        // ── إجمالي التشخيصات ─────────────────────────────────
        $totalDiagnoses = DiagnosisLog::where('user_id', $user->id)->count();
 
        // ── هذا الشهر ─────────────────────────────────────────
        $thisMonth = DiagnosisLog::where('user_id', $user->id)
                                 ->whereMonth('created_at', now()->month)
                                 ->whereYear('created_at',  now()->year)
                                 ->count();
 
        // ── متوسط درجة الثقة ──────────────────────────────────
        $avgCF = DiagnosisLog::where('user_id', $user->id)
                             ->whereNotNull('top_cf')
                             ->avg('top_cf');
 
        // ── عدد الأعطال المختلفة التي شُخِّصت ────────────────
        $uniqueFaults = DiagnosisLog::where('user_id', $user->id)
                                    ->whereNotNull('top_fault_name')
                                    ->distinct('top_fault_name')
                                    ->count('top_fault_name');
 
        // ── العطل الأكثر تكراراً ──────────────────────────────
        $mostCommonFault = DiagnosisLog::where('user_id', $user->id)
                                       ->whereNotNull('top_fault_name')
                                       ->select('top_fault_name', DB::raw('count(*) as count'))
                                       ->groupBy('top_fault_name')
                                       ->orderByDesc('count')
                                       ->first();
 
        // ── سجل التشخيصات (مُقسَّم) ──────────────────────────
        $logs = DiagnosisLog::where('user_id', $user->id)
                            ->latest()
                            ->paginate(10);
 
        return view('profile.show', compact(
            'totalDiagnoses',
            'thisMonth',
            'avgCF',
            'uniqueFaults',
            'mostCommonFault',
            'logs'
        ));
    }

    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
