import { bootstrapApplication } from '@angular/platform-browser';
import { AppComponent } from './app/app.component';
import { MemoryTipsComponent } from './app/memory-tips/memory-tips.component';

bootstrapApplication(AppComponent)
.catch(err => console.error(err));
