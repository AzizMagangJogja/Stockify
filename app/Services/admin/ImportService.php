<?php

namespace App\Services\Admin;

use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Admin\ImportRepository;

class ImportService {
    protected $importRepository;

    public function __construct(ImportRepository $importRepository) {
        $this->importRepository = $importRepository;
    }

    public function importProduct($file, $importClass) {
        $this->importRepository->importProduct($file, $importClass);
        
        UserActivity::create([
            'user_id' => Auth::id(),
            'action' => 'Import',
            'activity' => 'data ' . $file->getClientOriginalName(),
        ]);
    }
}